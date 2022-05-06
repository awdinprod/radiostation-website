'use strict';

class UserSettingsPage extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state = {
            username: "username",
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
                        <form className="settings-form" method="post">
                            <p className="user-settings-text"><b>Username:</b> {this.state.username}</p>
                            <input type="text" className="settings-input" name="username" placeholder="Enter new username" onChange={this.handleInputChange}/>
                            <p className="user-settings-text"><b>e-mail:</b> {this.state.email}</p>
                            <input type="text" className="settings-input" name="email" placeholder="Enter new email" onChange={this.handleInputChange}/>
                            <input type="submit" className="submit-btn" value="Submit changes"/>
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
