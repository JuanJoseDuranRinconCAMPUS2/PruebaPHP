
/* sacamos la url para manejo de data */
const url = window.location.href;
const URLTB = url.replace('/index.html', '/uploads');

async function getData(option) {
    const url = `${URLTB}/${option}`;
    console.log(url);
    fetch(url)
    .then(response => response.json())
    .then(data => {console.log(data);})
    .catch(error => {
        console.error('Error:', error);
    });
}
async function postData(option) {
    const url = `${URLT}/${option}`;
    fetch(url, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(result => {
    console.log(result);
    })
    .catch(error => {
    console.error('Error:', error);
    });
}
async function putData(option, data){
    const url = `${URLT}/${option}`;
    fetch(url, {
        method: 'PUT',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
      })
      .then(response => response.json())
      .then(result => {
        console.log(result);
      })
      .catch(error => {
        console.error('Error:', error);
      });
}
async function deteleData(option, id) {
    const url = `${URLT}/${option}`;
    fetch(url, {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(id),
    })
    .then(response => response.json())
    .then(result => {
    console.log(result);
    })
    .catch(error => {
    console.error('Error:', error);
    });
}
function clearContent() {
    const mainElement = document.querySelector('.content');
    if (mainElement) {
      mainElement.innerHTML = '';
    }
}

export default{
    getData,
    postData,
    putData,
    deteleData,
    clearContent
}