<div id='calendar' class="w-3/4 m-0"></div>
{{--    @dd($venue->sesi) --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let calendarEl = document.getElementById('calendar');
        let sesiInput = document.getElementById('sesiInput');
        let price = document.getElementById('price');
        let clickedEventId = null;
        let calendar = new FullCalendar.Calendar(calendarEl, {
            initialDate: '{{ now()->toDateString() }}',
            editable: true,
            selectable: true,
            businessHours: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                @foreach ($sesi as $data)

                    {
                        title: `{{ $data->jam_mulai }}-{{ $data->jam_selesai }}`,
                        start: "{{ $data->tanggal }}",
                        id: "{{ $data->id }}",
                        price: "{{ $data->price->price }}"
                    },
                @endforeach

            ],
            eventClick: function(info) {
                if (clickedEventId === info.event.id) {
                    // Klik ulang event yang sama, kembalikan ke warna awal dan hapus ID dari input hidden
                    info.event.setProp('backgroundColor', '');
                    info.event.setProp('borderColor', '');
                    clickedEventId = null;
                    sesiInput.value = '';
                } else {
                    // Event baru yang diklik, atur warna dan ID, serta isi input hidden
                    if (clickedEventId !== null) {
                        // Kembalikan event sebelumnya ke warna awal jika ada event yang sudah diklik sebelumnya
                        var prevEvent = calendar.getEventById(clickedEventId);
                        prevEvent.setProp('backgroundColor', '');
                        prevEvent.setProp('borderColor', '');
                    }
                    info.event.setProp('backgroundColor', 'green');
                    info.event.setProp('borderColor', 'green');
                    clickedEventId = info.event.id;
                    sesiInput.value = clickedEventId;
                    price.innerText = `Rp${info.event.extendedProps.price}`;
                }
            }
        });
        calendar.render();
    });
</script>
