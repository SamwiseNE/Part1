import React from "react";
import Authorscontent from "./authorscontent";


class Paper extends React.Component {

    constructor(props) {
        super(props)
        this.state = { display: false }
    }

    handleClick = () => {
        this.setState({display:!this.state.display})
    }


    render() {
        let details = "";

        if (this.state.display) {

            details =
                <div className="info">
                    <p>{this.props.paper.abstract}</p>
                    <Authorscontent paper_id={this.props.paper.paper_id} />
                </div>
        }

        return(

            <div>
                <p onClick={this.handleClick}>{this.props.paper.title}</p>
                {details}
            </div>
        )
    }
}

export default Paper;
