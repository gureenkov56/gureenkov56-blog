/**************
 * 1. Creating constants
 * 2. Japan Kaomoji random and copy
 */



/********
 * 1. Creating constants
 */

document.addEventListener('DOMContentLoaded', () => {
	const japanKaomoji = document.getElementById('japanKaomoji');

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
})