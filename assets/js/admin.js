document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.querySelector('.menu-btn');
    const sideBar = document.querySelector('.side-bar');
    const closeBtn = document.querySelector('.close-btn');
    const menuItems = document.querySelectorAll('.side-bar ul li');
    const contents = document.querySelectorAll('.content');

    // Existing event listeners
    menuBtn.addEventListener('click', function () {
        sideBar.classList.add('active');
    });

    closeBtn.addEventListener('click', function () {
        sideBar.classList.remove('active');
    });

    menuItems.forEach(item => {
        item.addEventListener('click', function () {
            const contentId = item.getAttribute('data-content');
            contents.forEach(content => {
                content.style.display = content.id === contentId ? 'block' : 'none';
            });
            sideBar.classList.remove('active');
        });
    });

    // CRUD Operations
    const userForm = document.getElementById('user-form');
    const userList = document.getElementById('user-list');
    const userIdField = document.getElementById('user-id');
    const usernameField = document.getElementById('username');
    const emailField = document.getElementById('email');

    let users = [];

    function renderUsers() {
        userList.innerHTML = '';
        users.forEach((user, index) => {
            const li = document.createElement('li');
            li.innerHTML = `
                <span>${user.username} (${user.email})</span>
                <button onclick="editUser(${index})">Edit</button>
                <button onclick="deleteUser(${index})">Delete</button>
            `;
            userList.appendChild(li);
        });
    }

    function fetchUsers() {
        fetch('crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'action=read'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                users = data.data;
                renderUsers();
            } else {
                console.error(data.message);
            }
        });
    }

    userForm.addEventListener('submit', function (e) {
        e.preventDefault();
        const id = userIdField.value;
        const username = usernameField.value;
        const email = emailField.value;
        const action = id ? 'update' : 'create';
        const formData = `action=${action}&username=${username}&email=${email}&id=${id}`;

        fetch('crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                userIdField.value = '';
                usernameField.value = '';
                emailField.value = '';
                fetchUsers();
            } else {
                console.error(data.message);
            }
        });
    });

    window.editUser = function (index) {
        const user = users[index];
        userIdField.value = user.id;
        usernameField.value = user.username;
        emailField.value = user.email;
    };

    window.deleteUser = function (index) {
        const user = users[index];
        const formData = `action=delete&id=${user.id}`;

        fetch('crud.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                fetchUsers();
            } else {
                console.error(data.message);
            }
        });
    };

    fetchUsers();
});
