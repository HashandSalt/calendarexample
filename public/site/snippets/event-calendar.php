<div id='calendar'></div>

<script>
$(document).ready(function() {

  $('#calendar').fullCalendar({


    header: {
      center: 'title',
      right: 'today',
      left: 'prev,next'

    },
		defaultDate: '<?= date('Y-m-d') ?>',
		navLinks: false,
		editable: false,
		eventLimit: true,

    events: [
		<?php foreach($eventroot as $event): ?>
			{
				title: '<?= $event['ETitle']; ?>',
				url: '<?= $event['ELink']; ?>',
				start: '<?= $event['EStart']; ?>',
				end: '<?= $event['EEnd']; ?>',
        eid: '<?= $event['EID']; ?>',
        src: '<?= $event['ESrc']; ?>',
        className: '<?= $event['ESrc']; ?>'
			},
		<?php endforeach ?>
  ],


   eventRender: function (event, element) {

       element.click(function() {

         if ( $( this ).hasClass( "gcalev" ) ) {
        // element.attr('href', 'javascript:void(0);');
         element.attr('href', '#E<?= $event['EID']; ?>');

         $.magnificPopup.open({
           items: {
             src: '#E<?= $event['EID']; ?>'
           },
           type: 'inline'
         }, 0);
         console.log('gcal event click');

     }
   });
  }

  });
});
</script>
