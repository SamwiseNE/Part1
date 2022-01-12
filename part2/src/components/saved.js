import React from "react";

class Saved extends React.Component {

    constructor(props) {
        super(props)
        this.state = { display: false }
    }

    handleClick = () => {
        this.setState({display:!this.state.display})
    }

    render() {
        return(
                <p>
                    {this.props.list.paper_id}
                </p>
        )
    }
}

export default Saved;