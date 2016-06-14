/**
 * Created by Gile1974 on 26.5.2016.
 */

var postId = 0;
var postNameElement = null;
var postBodyElement = null;

$('.edit').on('click', function (event) {

    event.preventDefault();
    postNameElement = event.target.parentNode.parentNode.childNodes[1];
    postBodyElement = event.target.parentNode.parentNode.childNodes[2];
    var postName = postNameElement.textContent;
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-name').val(postName);
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});

$('.view').on('click', function (event) {

    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#post-body').val(postBody);
    $('#view-modal').modal();
});

$('#modal-save').on('click', function () {
    $.ajax({
        method: 'POST',
        url: url,
        data: {name: $('#post-name'), body: $('#post-body').val(),  postId: postId, _token: token}
    })
        .done(function (msg) {
            $(postNameElement).text(msg['new_name']);
            $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');
        });
});

//$('.like').on('click', function (event) {
//    event.preventDefault();
//    postId = event.target.parentNode.parentNode.dataset['postid'];
//    var isLike = event.target.previousElementSibling == null;
//    $.ajax({
//        method: 'POST',
//        url: urlLike,
//        data: {isLike: isLike, postID: postId, _token: token}
//    })
//        .done(function () {
//            //change the page
//            event.target.textContent = isLike ? event.target.textContent == 'Like' ? 'You like this post' : 'Like' : event.target.textContent == 'Dislike' ? 'You don\'t like this post' : 'Dislike';
//            if (isLike) {
//                event.target.nextElementSibling.textContent = 'Dislike';
//            } else {
//                event.target.previousElementSibling.textContent = 'Like';
//            }
//        });
//    console.log(isLike);
//});


