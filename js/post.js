/**************
 * 1. Creating constants
 * 2. Japan Kaomoji random and copy
 * 3. Reactions
 */

document.addEventListener('DOMContentLoaded', () => {
	/********
	 * 1. Creating constants
	 */
	const
		japanKaomoji = document.getElementById('japanKaomoji'),
		reactionItem = document.querySelectorAll('.reaction__item'),
		reactionLike = document.getElementById('reactionLike'),
		reactionDisLike = document.getElementById('reactionDislike')
		;

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
})