
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
     $confirm=confirm("take test");
     if($confirm)
     {
       alert("yes goto test page");
       window.location.href=baseURL+"library/quiz";
     }
     else
     {
      alert("later pls");
     }

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

  /* Quiz Script */
