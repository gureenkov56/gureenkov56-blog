type LikeBtnStatus = 'clicked' | '';

window.onload = () => {
    console.log('post')
    const likeBtn = document.getElementById('likeBtn');
    const likeCount = document.getElementById('likeCount');

    const postId = likeBtn.dataset.id;

    likeBtn.addEventListener('click', () => {
        const status = likeBtn.dataset.status as LikeBtnStatus;
        let count = +likeCount.innerHTML;

        if (status === 'clicked') {
            likeBtn.dataset.status = '';
            likeBtn.querySelector('path').setAttribute('fill', 'none');
            fetch(`/api/like-post/${postId}/minus`)
                .then(() => '');
            count -= 1;

        } else {
            likeBtn.dataset.status = 'clicked';
            likeBtn.querySelector('path').setAttribute('fill', '#E9161E');
            fetch(`/api/like-post/${postId}`)
                .then(() => '');
            count += 1;
        }

        likeCount.innerHTML = `${count}`;
    })
}
