'use strict';

class UserSettingsPage extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state = {
            yourUsername: "username",
            email: "email-address"
        };

        this.handleInputChange = this.handleInputChange.bind(this);

    }

    handleInputChange(event)
    {
        const target = event.target;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }


    // handleSubmit(event)
    // {
    //     alert('Your changed username: ' + this.state.value);
    //     event.preventDefault();
    // }

    render()
    {
        return (
            <div>
                <h1>Settings</h1>
                <div className="post-temp">
                    <img src={"/Assets/dawn.jpeg"} className="user-settings-image" alt="user avatar"/>
                    <div className="user-settings">
                        <p className="user-settings-text"><b>Username:</b> "username string"</p>
                        <form className="settings-form">
                            <input type="text" className="settings-input" name="yourUsername" placeholder="Enter new username"/>
                            <input type="submit" className="submit-btn" value="Submit username"/>
                        </form>
                        <hr className="settings-divider"/>
                        <p className="user-settings-text"><b>e-mail:</b> "email string"</p>
                        <form className="settings-form">
                            <input type="text" className="settings-input" name="email" placeholder="Enter new email"/>
                            <input type="submit" className="submit-btn" value="Submit email"/>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

ReactDOM.render
(
    <UserSettingsPage/>,
    document.getElementById('user-page')
)
