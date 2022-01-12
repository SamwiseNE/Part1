import React from "react";

class PapersTitles extends React.Component {

    constructor(props) {
        super(props)
        this.state = { display: false }
    }

    handleClick = () => {
        this.setState({display:!this.state.display})
    }

    render() {

        console.log(this.props.paper)

        return (

            <div>
                <p>{this.props.paper.title}</p>
                <p>{this.props.paper.abstract}</p>
                <p>{this.props.paper.first_name} {this.props.paper.last_name}</p>
            </div>

        )
    }
}

export default PapersTitles;
