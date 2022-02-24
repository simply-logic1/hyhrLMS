 /* youtube Script */
 var testStatus=$('#test_status').val();
   var video_type=document.getElementById('video_type').value;
   if(video_type=='yt')
   {
   var tag = document.createElement('script');
    var yt_id=document.getElementById('yt_id').value;
    console.log("ytid"+yt_id);

      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
   }

      // 3. This function creates an <iframe> (and YouTube player)
      //    after the API code downloads.
      var player; var yt_dut;
      function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
          height: '390',
          width: '640',
          videoId: yt_id,
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      // 4. The API will call this function when the video player is ready.
      function onPlayerReady(event) {
     
         yt_dut=player.getDuration();
        event.target.playVideo(); // You can omit this to prevent the video starting as soon as it loads.
      }

      // 5. The API calls this function when the player's state changes.
      //    The function indicates that when playing a video (state=1),
      //    the player should play for six seconds and then stop.
      var done = false,end=false;
      function onPlayerStateChange(event) {
       if(event.data == YT.PlayerState.PAUSED){
           
            console.log("duration"+player.getDuration());
            var vtime=player.getCurrentTime();
        ytStoppedPlaying(vtime,end);
            playing = false;
            
			
       }
       else if(event.data== YT.PlayerState.ENDED)
       {
           end=true; 
           console.log("video edn"+end);
            var stime=player.getCurrentTime();
            ytStoppedPlaying(stime,end);
           if(end)
           {
               take_quiz();
           }
           
       }
      }
      function stopVideo() {
        player.stopVideo();
      }

  // Count as complete only if end of video was reached

 console.log("video edn"+end);
  function take_quiz()
  {
      console.log("end tst modle show"); 

      
      console.log("test"+testStatus);
      if(testStatus !='completed')
      {
    $('#take_test_emp').modal('show');
      }

                  $('#take_test_emp .modal-footer button').on('click',function(event){
                       
                       var $button=$(event.target);
                         $(this).closest('.modal').one('hidden.bs.modal', function() {

                    
                  var vid=$('#vid').val();
                         
              if($button[0].id=='test-confirm-button')
              {
                
                 window.location.href =baseURL+'library/take_test/'+vid;
            }
            else
            {
              
              
            }
             });
                        

                  });


     // $confirm=confirm("take test");
     // if($confirm)
     // {
     //   alert("yes goto test page");
     //   window.location.href=baseURL+"library/quiz";
     // }
     // else
     // {
     //  alert("later pls");
     // }

  }

 function ytStoppedPlaying(timePlayed1,end) {
 
  
  var tut1 = Math.round(timePlayed1)+"";
  console.log("time"+tut1);
    var hours2=Math.floor(tut1/3600);
  var min2=Math.floor((tut1-(hours2*3600))/60);
  var sec2=Math.floor(tut1-(hours2*3600)-(min2*60));
  if (hours2   < 10) {hours2   = "0"+hours2;}
  if (min2 < 10) {min2 = "0"+min2;}
  if (sec2 < 10) {sec2 = "0"+sec2 ;} 


  var view_ratio1=hours2+":" +min2+":"+sec2;
  
  console.log("hours" +hours2+":"+min2+":"+sec2);
  console.log("Duration: ", tut1);
  console.log("min",min2);
  console.log('sec',sec2);
  
    var thrs=Math.floor(yt_dut/3600);
  var tmin=Math.floor((yt_dut-(thrs*3600))/60);
  var tsec=Math.floor(yt_dut-(thrs*3600)-(tmin*60));
  if (thrs   < 10) {thrs   = "0"+thrs;}
  if (tmin < 10) {tmin = "0"+tmin;}
  if (tsec < 10) {tsec = "0"+tsec ;} 


  var total_yt_dur=thrs+":" +tmin+":"+tsec;
  console.log("total"+total_yt_dur);


  var course_id1=document.getElementById('course_id').value;
  console.log("course id"+course_id1);
  var yt_status;
  if(end)
  {
      yt_status="completed";
  }
  else
  {
      yt_status=""
  }
 
  var data={'course_id':course_id1,'view_ratio':view_ratio1,'video_duration':total_yt_dur,'status':yt_status}

  console.log("data"+data);
  $.ajax({

    'method':'POST',
    'data':data,
    'url':baseURL+'store_emp_perform',
    success:function(data){
      console.log("success");
    },
    error:function(error){
      console.log("error");
    }


  })

}

var length_start=document.getElementById('video_ratio').value;


var videoPlayButton,videoResumeButton,
	videoWrapper = document.getElementsByClassName('video-wrapper')[0],
    video = document.getElementsByTagName('video')[0],
    videoMethods = {
        renderVideoPlayButton: function() {
            if (videoWrapper.contains(video)) {
				this.formatVideoPlayButton()
                video.classList.add('has-media-controls-hidden')
                if(length_start>'00')
        		{
        			
             		videoResumeButton = document.getElementsByClassName('video-overlay-resume-button')[0].addEventListener('click', this.hideVideoButtons)
             		videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0].addEventListener('click', this.hideVideoPlayButton)

             	}
             	else
             	{	
              		videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0].addEventListener('click', this.hideVideoPlayButton)
              		
              	}
                
            }
        },

        formatVideoPlayButton: function() {
        	if(length_start>'00:00:00')
        	{
        	
        		
				 videoWrapper.insertAdjacentHTML('beforeend', '\
	                <div class="insert-icons">\
					<i class="fa fa-play video-overlay-play-button " id="video-overstyle-play-btn"></i>\
					<i class="fa fa-refresh video-overlay-resume-button" style="cursor:pointer"></i>\
				</div>\
	            ')
        	}
        	else
        	{
	            videoWrapper.insertAdjacentHTML('beforeend', '\
	                <svg class="video-overlay-play-button"  viewBox="0 0 200 200" alt="Play video">\
	                    <circle cx="100" cy="100" r="90" fill="none" stroke-width="15" stroke="#fff"/>\
	                    <polygon points="70, 55 70, 145 145, 100" fill="#fff"/>\
	                </svg>\
	            ')
            }
           
        },

        hideVideoPlayButton: function() {
            video.play()
            videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0];
            
              
            videoPlayButton.classList.add('is-hidden')


           
            video.classList.remove('has-media-controls-hidden')
            video.setAttribute('controls', 'controls')
        },
         hideVideoButtons: function() {
         
         	 

          
		 	video.load()

            video.currentTime=length_start

      		video.play()

            videoResumeButton = document.getElementsByClassName('video-overlay-resume-button')[0];
            videoPlayButton = document.getElementsByClassName('video-overlay-play-button')[0];
            
           videoPlayButton.classList.add('is-hidden')
            videoResumeButton.classList.add('is-hidden')
            video.classList.remove('has-media-controls-hidden')
            video.setAttribute('controls', 'controls')
        }
     
       
	}


videoMethods.renderVideoPlayButton();


/*video ediitng */

$(document).ready(function(){

  $('#take_quiz').click(function(){

    alert("test");
  })
});
var video=document.getElementsByTagName('video')[0];

/* vidoe started and stoppeed playing  */



var timeStarted = -1;
var timePlayed = 0;
var duration = 0;
var video_duration=00;
var status="incomplete";
var prevTime=0;
// If video metadata is laoded get duration
if(video.readyState > 0)
  getDuration.call(video);
//If metadata not loaded, use event to get it
else
{
  video.addEventListener('loadedmetadata', getDuration);
}

function videoStartedPlaying() {
 
 timeStarted=video.currentTime;
  console.log(video.currentTime);

}
function videoStoppedPlaying(event) {
 
  if(timeStarted>0) {
    
    timePlayed=video.currentTime;

  }
  var tut = Math.round(timePlayed)+"";
  console.log("time"+tut);
    var hours1=Math.floor(tut/3600);
  var min1=Math.floor((tut-(hours1*3600))/60);
  var sec1=Math.floor(tut-(hours1*3600)-(min1*60));
  if (hours1   < 10) {hours1   = "0"+hours1;}
  if (min1 < 10) {min1 = "0"+min1;}
  if (sec1 < 10) {sec1 = "0"+sec1 ;}


  var view_ratio=hours1+":" +min1+":"+sec1;
  console.log("hours" +hours1+":"+min1+":"+sec1);
  console.log("Duration: ", tut);
  console.log("min",min1);
  console.log('sec',sec1);

  // Count as complete only if end of video was reached
  if(timePlayed>=duration && event.type=="ended") {
    //document.getElementById("status").className="complete";
   
     status="completed";
      
  }
  console.log("status"+status);

  if(status=="completed")
  {
    console.log("test"+testStatus);
    if(testStatus !='completed')
    {
    $('#take_test_emp').modal('show');
    }



     // $confirm=confirm("take test");
     // if($confirm)
     // {
     //   alert("yes goto test page");
     //   window.location.href=baseURL+"library/quiz";
     // }
     // else
     // {
     //  alert("later pls");
     // }

  }

  var course_id=document.getElementById('course_id').value;
  console.log("course id"+course_id);
 
  var data={'course_id':course_id,'view_ratio':view_ratio,'video_duration':video_duration,'status':status}

  console.log("data"+data);
  $.ajax({

    'method':'POST',
    'data':data,
    'url':baseURL+'store_emp_perform',
    success:function(data){
      console.log("success");
    },
    error:function(error){
      console.log("error");
    }


  })

}

function getDuration() {
	  duration = video.duration;
	  var min=parseInt(duration/60,10);

	  var sec=duration%60;
	//  document.getElementById("duration").appendChild(new Text(Math.round(duration)+""));
	var hours=Math.floor(duration/3600);
	var min=Math.floor((duration-(hours*3600))/60);
	var sec=Math.floor(duration-(hours*3600)-(min*60));
	if (hours   < 10) {hours   = "0"+hours;}
	    if (min < 10) {min = "0"+min;}
	    if (sec < 10) {sec = "0"+sec ;}


  video_duration=hours+":"+min+":"+sec;
	console.log("hours" +hours+":"+min+":"+sec);
	console.log("Duration: ", duration);
	console.log("min",min);
	console.log('sec',sec);
}
function videoTimeupdate()
{
   if(!video.seeking)
   {
    prevTime=Math.max(video.currentTime,prevTime);
    console.log("video seeking"+video.seeking);
   }
}

function videoSeeking()
{
  if(video.currentTime > prevTime)
  {
    video.currentTime=prevTime;
    console.log("video set"+video.currentTime+"video prevTime"+prevTime);
  }

}
video.addEventListener("play", videoStartedPlaying);
video.addEventListener("playing", videoStartedPlaying);

video.addEventListener("ended", videoStoppedPlaying);
video.addEventListener("pause", videoStoppedPlaying);
video.addEventListener("timeupdate",videoTimeupdate);
video.addEventListener("seeking",videoSeeking);

$('#test-confirm-button').on('click',function(event){
                       
  var $button=$(event.target);
  var vid=$('#vid').val();
  window.location.href =baseURL+'library/take_test/'+vid;
  
   

});
$('#test-cancel-btn').on('click',function(event){
                       
  $('#take_test_emp').modal('hide');

});

  /* Quiz Script */
  
  
  
  
