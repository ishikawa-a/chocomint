/* Infinite Scroll */
jQuery(function($){
  var page = 2;
  var loading = false;
  var finished = false;

  function loadPosts() {
    if(loading || finished) {
      return;
    }
 
    loading = true;
    $('.load-more-button').addClass('loading');
 
    $.when(
    $.ajax({
      url: infiniteScroll.ajaxurl,
      type: 'post',
      data: {
        action: 'load_more_posts',
        page: page,
        _ajax_nonce: infiniteScroll.my_ajax_nonce,
      },
      success: function(response) {
        if (response) {
          $('.article-item-list').append(response);
          page++;
          loading = false;
          $('.load-more-button').removeClass('loading');
        } else {
          finished = true;
          $('.load-more-button').addClass('hidden');
        }
      }
    })
    ).done(function() {
      delayScrollAnime();
    });
  }

  $('.load-more-button').on('click', function(e){
    e.preventDefault();
    loadPosts();
  });
});