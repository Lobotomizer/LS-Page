

var fltr = $('.filtr-container').filterizr({setupControls: false});

$('.show-all-bands').click(function() {
  fltr.filterizr('filter', 'all');
});

$('.vintage-electro').click(function() {
  fltr.filterizr('filter', '1');
});

$('.balkan-world').click(function() {
  fltr.filterizr('filter', '2');
});

$('.blues-rock').click(function() {
  fltr.filterizr('filter', '3');
});

var fltr2 = $('.filtr-container2').filterizr({setupControls: false});

$('.show-all-djs').click(function() {
  fltr2.filterizr('filter', 'all');
});

$('.vintage-electro-dj').click(function() {
  fltr2.filterizr('filter', '4');
});

$('.global-bass').click(function() {
  fltr2.filterizr('filter', '5');
});
