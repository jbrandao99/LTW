'use strict';

// Id of last message received
let last_id = -1;
let place_id = document.querySelector('input[name=place_id]').value;

let messages = document.querySelector('#messages');
let button = document.getElementById("send");

button.addEventListener("click", sendMessage);;

// Run refresh every 5s
window.setInterval(refresh, 5000);

// Run refresh when starting
refresh();

// Ask for new messages
function refresh() {
  let request = new XMLHttpRequest();
  request.open('get', 'sendmessage.php?' + encodeForAjax({ 'last_id': last_id,'place_id': place_id}), true);
  request.addEventListener('load', messagesReceived);
  request.send();
}

// Send message
function sendMessage(event) {
  let username = document.querySelector('input[name=username]').value;
  let message = document.querySelector('input[name=message]').value;
  // Delete sent message
  document.querySelector('input[name=message]').value='';

  // Send message
  let request = new XMLHttpRequest();
  request.open('get', 'sendmessage.php?' + encodeForAjax({ 'last_id': last_id, 'username': username, 'text': message, 'place_id': place_id}), true);
  request.addEventListener('load', messagesReceived);
  request.send();

  event.preventDefault();
}

// Called when messages are received
function messagesReceived() {
  let lines = JSON.parse(this.responseText);
  lines.forEach(function(data){
    let line = document.createElement('div');

    last_id = data.id;

    line.classList.add('line');
    line.innerHTML =
      '<span class="time">' + data.time + '</span>' +
      '<span class="username">' + data.username + ':</span>' +
      '<span class="message">' + data.text + '</span>';

    messages.append(line);
    messages.scrollTop = messages.scrollTopMax;
  });
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&');
}
