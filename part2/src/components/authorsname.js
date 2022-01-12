import React from "react";

class AuthorsNames extends React.Component {

    constructor(props) {
        super(props)
        this.state = { display: false }
    }

    handleClick = () => {
        this.setState({display:!this.state.display})
    }

    render() {

        return (

            <div>
                <p>{this.props.author.first_name} {this.props.author.last_name}</p>
            </div>

        )
    }
}

export default AuthorsNames;
