jQuery(document).ready(function(){jQuery(".enable-update").on("click",function(e){e.preventDefault(),!0===confirm("I have read the warning and understand updating could cause unexpected results.")&&(jQuery("#age-gate-update .update-link").css({pointerEvents:"initial",opacity:1,cursor:"pointer"}),alert("You can now proceed with the update"))})});