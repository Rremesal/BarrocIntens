<x-app-layout>
    <!DOCTYPE html>
    <html lang='en'>
      <head>
        <meta charset='utf-8' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
        <script>
          
          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('maintencance_appointemts');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              locale: 'nl', 
              headerToolbar: {
                start: 'title',
                center: '',
                end: 'today prev,next'
              },
              eventClick: function(info) {
              alert('Event: ' + info.event.title);
              alert('Event: ' + info.event.description);
              
              info.el.style.borderColor = 'red';
            },
              events: {{ Js::from($data)}}
            });
            calendar.render();
          });
  
        </script>
      </head>
      <body>
        <div id='maintencance_appointemts'></div>
      </body>
    </html>
  </x-app-layout>