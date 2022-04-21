function register() {
    const { user, token, error } = await kontenbaseClient.auth.register({
        firstName: document.getElementById('first-name').value,
        lastName: document.getElementById('last-name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
    })
}

function login() {
    const { user, token, error } = await kontenbaseClient.auth.login({
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
    })
}

function create() {
    const { data, error } = await kontenbaseClient.service('todos').create({
        title: document.getElementById('title').value,
        desc: document.getElementById('desc').value,
    })
}

function findAll() {
    const { data, error } = await kontenbaseClient.service('todos').find()
}

function update(id) {
    const { data, error } = await kontenbaseClient.service('todos').updateById(id, {
        title: document.getElementById('title').value,
        desc: document.getElementById('desc').value,
    })
}

function destroy(id) {
    const { data, error } = await kontenbase.service('todos').deleteById(id)
}