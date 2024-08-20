function MaxNumber_length() {
    let values = document.getElementById('defaultFormControlInput_minutes');
    if (values.value.charAt(0) === '0') {
        values.value = '';
    }
    if (values.value > 150) {
        alert('Maximum duration allowed is 3 hours (180 minutes). 1 hour = 60 minutes.');
        values.value = 180;
    }
    let value = values.value;
    let newValue = '';
    for (let i = 0; i < value.length; i++) {
        if (value.charAt(i) !== '-') {
            newValue += value.charAt(i);
        }
    }
    values.value = newValue;
    values.value = values.value.replace(/[^0-9.]/g, "").replace(/(\..*?)\..*/g, "$1");
}

function MinimumZero() {

    let values = document.getElementById('defaultFormControlInputs1');
    if (values.value.charAt(0) === '0') {
        values.value = '';
    }
    values.value = values.value.replace(/[^0-9.]/g, "").replace(/(\..*?)\..*/g, "$1");
}

function MaxNumber(id) {
    let values = document.getElementById('defaultFormControlInputs' + id);
    var data = new FormData();
    data.append('id', id);
    data.append('result', values.value);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'ajax/view_quiz.php', true);
    xhr.onload = function() {
        if (this.responseText.trim() === 'true') {
            document.getElementById('buttons' + id).setAttribute('disabled', 'disabled');
        } else {
            document.getElementById('buttons' + id).removeAttribute('disabled');
        }
    };
    xhr.send(data);

    if (values.value.charAt(0) === '0') {
        values.value = '';
    }
    if (values.value > 150) {
        alert('Maximum of 150 questions allowed.');
        values.value = 150;
    }
    let value = values.value;
    let newValue = '';
    for (let i = 0; i < value.length; i++) {
        if (value.charAt(i) !== '-') {
            newValue += value.charAt(i);
        }
    }
    values.value = newValue;
}
// remove
function DeleteValues(id) {
    if (confirm("Are you sure, you want to delete this room?")) {
        let data = new FormData();
        data.append('id', id);
        data.append('remove', '');
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/login_crud.php', true);

        xhr.onload = function() {
            if (xhr.responseText == true) {
                alert('remove successfully');
                location.reload();
            } else {
                alert('server down');
            }
        };
        xhr.send(data);
    }
};
// update 
async function UpdatedValues(id) {
    let data = new FormData();
    data.append('id', id);
    data.append('update', '');

    try {
        const response = await fetch('ajax/view_quiz.php', {
            method: 'POST',
            body: data
        });

        if (response.ok) {
            const html = await response.text();
            document.getElementById('response_part').innerHTML = html;
        } else {
            throw new Error('Request failed. Please try again later.');
        }
    } catch (error) {
        alert(error.message);
    }
}
// 
function upd_submit() {
    let form = document.getElementById('assign_quiz');
    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let data = new FormData(form);

        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'ajax/view_quiz.php', true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                if (xhr.responseText == 1) {
                    form.reset();
                    alert('Updated success');
                    location.reload();
                } else {
                    alert('Server response: ' + xhr.responseText);
                }
            } else {
                alert('Request failed. Please try again later.');
            }
        };
        xhr.onerror = function() {
            alert('Network error occurred. Please try again later.');
        };
        xhr.send(data);
    });
}