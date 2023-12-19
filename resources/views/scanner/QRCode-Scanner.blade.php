<x-app-layout>
    
    <div class="row">
        <div class="preview-container col-md-4 offset-md-4 border-1">
            <video id="preview" autoplay="autoplay" class="active" style="transform: scaleX(-1);"></video>
        </div>
    </div>

    <script src="{{asset('assets/js/instascan.min.js')}}"></script>
    <!-- Add this script to send the scanned value to the Laravel route -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                    .then(function (stream) {
                        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5 });

                        scanner.addListener('scan', function (content, image) {
                            // Send the scanned content to the Laravel route
                            fetch('/scan', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token if you're using it
                                },
                                body: JSON.stringify({ content: content }),
                            })
                                .then(response => response.json())
                                .then(data => console.log(data))
                                .catch(error => console.error(error));
                        });

                        Instascan.Camera.getCameras().then(function (cameras) {
                            if (cameras.length > 0) {
                                scanner.start(cameras[0]);
                            } else {
                                console.error('No cameras found.');
                            }
                        }).catch(function (e) {
                            console.error(e);
                        });
                    })
                    .catch(function (error) {
                        console.error('Error accessing camera:', error);
                    });
            } else {
                console.error('getUserMedia not supported on your browser!');
            }
        });
    </script>
</x-app-layout>