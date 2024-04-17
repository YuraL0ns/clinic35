import Echo from 'laravel-echo'

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '95b49b74390be3e3997b',
    cluster: 'eu',
    forceTLS: true
});

var channel = Echo.channel('my-channel');
channel.listen('.my-event', function(data) {
    alert(JSON.stringify(data));
});