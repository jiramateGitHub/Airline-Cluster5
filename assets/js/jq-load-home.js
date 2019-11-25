$('#btn1').on('click', function(e) {                 // User clicks nav link
  e.preventDefault();                                // Stop loading new link
  var url = this.href;                               // Get value of href

  $('#b').removeClass('w3-border-red');         // Clear current indicator
  $('#a').addClass('w3-border-red');                       // New current indicator

  $('#container').remove();                          // Remove old content
  $('#content').load(url + ' #container').hide().fadeIn('slow'); // New content
});
$('#btn2').on('click', function(e) {                 // User clicks nav link
  e.preventDefault();                                // Stop loading new link
  var url = this.href;                               // Get value of href

  $('#a').removeClass('w3-border-red');         // Clear current indicator
  $('#b').addClass('w3-border-red');                       // New current indicator

  $('#container').remove();                          // Remove old content
  $('#content').load(url + ' #container').hide().fadeIn('slow'); // New content
});