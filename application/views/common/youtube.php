  <div class="player">
    <div class="mainVideo">
      <div class="wrapper" id="player_wrapper">
		<div id="player"></div>
      </div> 
    </div>
    <div class="playlist">

      <div class="top">
        <div class="wrapper">
          <span class="text">Все обзоры этого товара</span>
          <a href="#" class="full_size"></a>
        </div>
      </div>


      <div class="wrapperVideo scrollbar-macosx" id="playlist">



      </div>

      <div class="bottom">
        <div class="wrapper">
          <a href="#" class="text">Youtube</a>
          <a href="#" class="text">Telisco</a>
          <span class="text">Powered by </span>
        </div>
      </div>

    </div>

  </div>
  <script src="/assets/js/youtube.min.js"></script>
  <script>  
    jQuery(document).ready(function(){
      jQuery('.scrollbar-macosx').scrollbar();
    });
	var tag = document.createElement('script');
	tag.src = "https://www.youtube.com/iframe_api";
	var firstScriptTag = document.getElementsByTagName('script')[0];
	firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);	
  </script>