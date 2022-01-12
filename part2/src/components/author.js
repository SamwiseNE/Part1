import React from "react";
import PapersContent from "./paperscontent";


class Author extends React.Component {

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
                    <PapersContent author_id={this.props.author.author_id} />
                </div>
        }


        return(

            <div>
                <p onClick={this.handleClick}>{this.props.author.first_name} {this.props.author.last_name}</p>
                {details}
            </div>
        )
    }
}

export default Author;
