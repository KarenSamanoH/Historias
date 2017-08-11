var autocollapse = function() {
  
  var tabs = $('#tabs');
  var tabsHeight = tabs.innerHeight();
  
  if (tabsHeight >= 50) {
    while(tabsHeight > 50) {
      //console.log("new"+tabsHeight);
      
      var children = tabs.children('li:not(:last-child)');
      var count = children.size();
      $(children[count-1]).prependTo('#collapsed');
      
      tabsHeight = tabs.innerHeight();
    }
  }
  else {
      while(tabsHeight < 50 && (tabs.children('li').size()>0)) {
      
      var collapsed = $('#collapsed').children('li');
      var count = collapsed.size();
      $(collapsed[0]).insertBefore(tabs.children('li:last-child'));
      tabsHeight = tabs.innerHeight();
    }
    if (tabsHeight>50) { // double chk height again
    	autocollapse();
    }
  }
  
};

$(document).ready(function() {
  
  	autocollapse(); // when document first loads

	$(window).on('resize', autocollapse); // when window is resized
  
});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


