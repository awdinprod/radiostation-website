'use strict';

function UserSettingsPage() {

    const [inputs, setInputs] = React.useState({});

    const handleChange = (event) => {
        const name = event.target.name;
        const value = event.target.value;
        setInputs(values => ({...values, [name]: value}))
    }

    const sendHttpRequest = (method, url, data) => {
        return fetch(url, {
            method: method,
            body: data,
            headers: data ? {'Content-Type' : 'application/x-www-form-urlencoded'} : {}
        }).then(response => console.log(response));
    };

    const requestTransform = (data) => {
        let formBody = []
        for (let property in data) {
            let encodedKey = encodeURIComponent(property);
            let encodedValue = encodeURIComponent(data[property]);
            formBody.push(encodedKey + "=" + encodedValue)
        }
        formBody = formBody.join("&");
        return formBody;
    }

    let handleSubmit = (event) => {
        event.preventDefault();
        let userForm = requestTransform(inputs);
        sendHttpRequest('POST', '/api-user-changedata', userForm);
        alert("Please reload this page to see changes");
    }

    return (
        <div>
            <h1>Settings</h1>
            <div className="post-temp">
                <img src={"/Assets/dawn.jpeg"} className="user-settings-image" alt="user avatar"/>
                <div className="user-settings">
                    <form className="settings-form" onSubmit={handleSubmit} method="post">
                        <label>Change username:
                            <input
                                type="text"
                                name="username"
                                className="settings-input"
                                placeholder="Enter new username"
                                value={inputs.username}
                                onChange={handleChange}
                            />
                        </label>
                        <label>Change email:
                            <input
                                type="text"
                                name="email"
                                className="settings-input"
                                placeholder="Enter new email"
                                value={inputs.email}
                                onChange={handleChange}
                            />
                        </label>
                        <button
                            type="submit"
                            className="submit-btn"
                            name="change_user_data">Submit changes
                        </button>
                    </form>
                </div>
            </div>
        </div>
    );
}

ReactDOM.render
(
    <UserSettingsPage/>,
    document.getElementById('user-page')
)
