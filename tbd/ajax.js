document.addEventListener('DOMContentLoaded', function() {
    let app_start = document.getElementById('start-app');
    let app = document.getElementById('app');

    app_start.addEventListener('click', function(e) {

        const formData = new URLSearchParams();
    
        formData.append( 'action', e.target.dataset.action );
        formData.append( 'nonce', data.ajaxnonce );

        fetch(data.ajaxurl, {
            method: "POST",
            body: formData
        })
        .then((response) => response.json())
        .then((result) => {
            if (result && result.success == true ) {
                app.innerText = result.data.counter;
            } else {
                app.innerText = "errror";
            }
        })
        .catch((error) => {
            console.log('[WP AJAX ERROR]');
            console.log(error);
        });
    });
});