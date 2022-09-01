/**************
 * 1. Creating constants
 * 2. Japan Kaomoji random and copy
 * 3. Reactions
 * 4. JS story images
 */

document.addEventListener('DOMContentLoaded', () => {
	/********
	 * 1. Creating constants
	 */
	const
		japanKaomoji = document.getElementById('japanKaomoji'),

		reactionItem = document.querySelectorAll('.reaction__item'),
		reactionLike = document.getElementById('reactionLike'),
		reactionDisLike = document.getElementById('reactionDislike'),

		jsStories = document.querySelectorAll('.js-story');

	let jsStoriesTimer = null;

	/************************************
	 * 2. Japan Kaomoji random and copy *
	 ************************************/

	if (japanKaomoji) {
		let kaoMojiArr = [
			'(⊃｡•́‿•̀｡)⊃',
			'( ˘▽˘)っ♨',
			'(〜￣▽￣)〜',
			'~(˘▽˘)~',
			'(⌐■_■)',
			'( ಠ ʖ̯ ಠ)',
			'( ಠ ͜ʖ ಠ)',
			'(ʘ ͜ʖ ʘ)',
			'( ･ิ ͜ʖ ･ิ)',
			'(ಠ_ಠ)',
			'︵‿ヽ(°□° )ノ︵‿',
			'ଘ(੭ˊ꒳​ˋ)੭✧'
		];

		let randomIndex = Math.floor(Math.random() * (kaoMojiArr.length));

		japanKaomoji.innerHTML = kaoMojiArr[randomIndex];
		inputForKaomoji.value = kaoMojiArr[randomIndex];

		document.getElementById('copyKaomoji').addEventListener('click', () => {
			inputForKaomoji.select();
			document.execCommand("copy");
			alert('В твоем буфере, бро (если ты понимаешь, о чем я)');
		})
	}

	/****************
	 * 3. Reactions *
	 ****************/

	const reactionArray = {
		'reactionLike'			: {
			activeColor: '#fddb53',
			symbol: '👍'
		},
		'reactionFire'			: {
			activeColor: '#ffba8b',
			symbol: '🔥'
		},
		'reactionDislike'		: {
			activeColor: '#fddb53',
			symbol: '👎'
		},
		'reactionSmilingShit'	: {
			activeColor: '#fddb53',
			symbol: '💩'
		},
		'reactionBrainExplosion': {
			activeColor: '#fddb53',
			symbol: '🤯'
		},
		'reactionHeart'			: {
			activeColor: '#ffb7b7',
			symbol: '❤️'
		},
		'reactionShock'			: {
			activeColor: '#fddb53',
			symbol: '😱'
		},
		'reactionSad'			: {
			activeColor: '#fddb53',
			symbol: '😢'
		},
		'reactionAngry'			: {
			activeColor: '#f5a93f',
			symbol: '🤬'
		},

	}

	if (reactionItem) {
		reactionItem.forEach(reaction => {

			reaction.querySelector('.reaction__emoji').innerHTML = reactionArray[reaction.id]['symbol'];

			if ( localStorage.getItem(reaction.id + "ForPostID=" + post_id) ) {
				reaction.classList.add('active');
				reaction.style.backgroundColor = reactionArray[reaction.id]['activeColor'];
			}

			reaction.addEventListener('click', () => {

				// like and dislike
				if (reaction.id === "reactionLike" && reactionDisLike.classList.contains('active')) {
					reactionDisLike.click();
				}

				if (reaction.id === "reactionDislike" && reactionLike.classList.contains('active')) {
					reactionLike.click();
				}


				// add vote
				const reactionCount = reaction.querySelector('.reaction__count');

				if (!reaction.classList.contains('active')) {
					reaction.classList.add('active');
					reaction.style.backgroundColor = reactionArray[reaction.id]['activeColor'];
					reactionCount.innerHTML = Number(reactionCount.innerHTML) + 1;
					localStorage.setItem(reaction.id + "ForPostID=" + post_id, 1);
				} else {
					reaction.classList.remove('active');
					reactionCount.innerHTML = Number(reactionCount.innerHTML) - 1;
					reaction.style.backgroundColor = '#f6f6f6';
					localStorage.removeItem(reaction.id + "ForPostID=" + post_id);
				}

				// send reaction to API
				let formdata = new FormData();
				formdata.append('name', reaction.id);
				formdata.append('post_related', post_id);
				formdata.append('action', reaction.classList.contains('active') ? 'plus' : 'minus');


				fetch('../php/api/send-reaction.php', {
					method: "POST",
					body: formdata,
				})


			})
		})
	}

	/**********************
	 * 4. JS story images *
	 **********************/
	if (jsStories) {
		const divStoryProgress = document.createElement('div');
		divStoryProgress.classList.add('story__progress')

		window.addEventListener('scroll', function() {
			let windowbottomPosition = pageYOffset + document.documentElement.clientHeight;

			jsStories.forEach(jsStory => {
				const jsStoryPosition = jsStory.getBoundingClientRect().top + pageYOffset;

				if (windowbottomPosition >= jsStoryPosition) {
					if (!jsStory.classList.contains('started')) {
						jsStory.classList.add('started');

						// show image
						let imgArray = jsStory.dataset.images.split('|'),
							imgAltes = jsStory.dataset.descriptions.split('|'),
							activeIdx = 0;

						const jsStoryImgContainer = jsStory.querySelector('.js-story-img-container'),
							storyCounter = jsStory.querySelector('.story__counter');

						jsStoryImgContainer.innerHTML = '';

						imgArray.forEach((imgLink, idx) => {
							// add images
							const img = document.createElement('img');
							if (idx === 0) img.classList.add('active');
							img.src = imgLink;
							img.alt = imgAltes[idx];
							img.dataset.index = idx;
							img.classList.add(`index${idx}`);
							jsStoryImgContainer.appendChild(img);

							// add progress indicator
							const div = document.createElement('div');
							if (idx === 0) {
								div.appendChild(divStoryProgress);
							}
							div.dataset.progressIndex = idx;
							div.classList.add(`progress${idx}`, 'progressItem');
							storyCounter.appendChild(div);
						})

						jsStoriesTimer = setInterval(() => autoToggleImageInCarousel(jsStory), 7000)
					}
				}
			})
		});

		// todo: * Здесь можно написать одну функцию переключения картинок вперед и назад. Запускать её автоматически по таймеру или вручную при переключении

		jsStories.forEach(jsStory => {
			const backToggler = jsStory.querySelector('.back'),
				nextToggler = jsStory.querySelector('.next');

			backToggler.addEventListener('click', () => {
				clearInterval(jsStoriesTimer);

				const activeImage = jsStory.querySelector('img.active'),
					activeIndex = Number(activeImage.dataset.index),
					newActiveImage = jsStory.querySelector(`[data-index="${activeIndex - 1}"]`) || jsStory.querySelector(`[data-index="${jsStory.querySelectorAll('[data-index]').length - 1}"]`);

				activeImage.classList.remove('active');
				newActiveImage.classList.add('active');

				const divProgress = document.createElement('div'),
					progressDivAll = jsStory.querySelectorAll('[data-progress-index]'),
					newActiveProgress = jsStory.querySelector(`[data-progress-index="${newActiveImage.dataset.index}"]`);

				divProgress.classList.add('story__progress');

				progressDivAll.forEach(progressDiv => {
					progressDiv.innerHTML = '';
					progressDiv.classList.remove('done');
					if (newActiveImage.dataset.index > 0) {
						for (let i = 0; i < newActiveImage.dataset.index; i++) jsStory.querySelector(`[data-progress-index="${i}"]`).classList.add('done');
					}
				})
				newActiveProgress.appendChild(divProgress);

				jsStoriesTimer = setInterval(() => autoToggleImageInCarousel(jsStory), 7000)
			})

			nextToggler.addEventListener('click', () => {
				clearInterval(jsStoriesTimer);

				const activeImage = jsStory.querySelector('img.active'),
					activeIndex = Number(activeImage.dataset.index),
					newActiveImage = jsStory.querySelector(`[data-index="${activeIndex + 1}"]`) || jsStory.querySelector(`[data-index="0"]`);

				activeImage.classList.remove('active');
				newActiveImage.classList.add('active');

				const divProgress = document.createElement('div'),
					progressDivAll = jsStory.querySelectorAll('[data-progress-index]'),
					newActiveProgress = jsStory.querySelector(`[data-progress-index="${newActiveImage.dataset.index}"]`);

				divProgress.classList.add('story__progress');

				progressDivAll.forEach(progressDiv => {
					progressDiv.innerHTML = '';
					progressDiv.classList.remove('done');
					if (newActiveImage.dataset.index > 0) {
						for (let i = 0; i < newActiveImage.dataset.index; i++) jsStory.querySelector(`[data-progress-index="${i}"]`).classList.add('done');
					}
				})
				newActiveProgress.appendChild(divProgress);

				jsStoriesTimer = setInterval(() => autoToggleImageInCarousel(jsStory), 7000)
			})
		})
	}

	function autoToggleImageInCarousel(jsStory) {
		let activeIdx = jsStory.querySelector('img.active').dataset.index;
		jsStory.querySelector('img.active').classList.remove('active');
		jsStory.querySelector(`[data-progress-index='${activeIdx}']`).innerHTML = '';
		jsStory.querySelector(`[data-progress-index='${activeIdx}']`).classList.add('done');

		activeIdx++;
		if (activeIdx == jsStory.querySelectorAll('img[data-index]').length) {
			activeIdx = 0;
			jsStory.querySelectorAll('[data-progress-index]').forEach(el => el.classList.remove('done'));
		}
		jsStory.querySelector(`[data-index='${activeIdx}']`).classList.add('active');
		jsStory.querySelector(`[data-progress-index='${activeIdx}']`).appendChild(divStoryProgress);
	}

})