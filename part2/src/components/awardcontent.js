import React from 'react';


class AwardContent extends React.Component {

    render() {

        return (
            <div>
                <div>{this.props.award === "" ? "No Award" : this.props.award}</div>
            </div>
        );
    }
}

export default AwardContent;