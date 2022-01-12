import React from "react";

class SelectAward extends React.Component {


    render() {
        return (
            <label>
                Award:
                <select value={this.props.award} onChange={this.props.handleAwardSelect}>
                    <option value="">Any</option>
                    <option value="Best paper">Best paper</option>
                    <option value="Best paper honourable mention">Best paper honourable mention</option>
                    <option value="Best pictorial">Best pictorial</option>
                    <option value="Best pictorial honourable mention">Best pictorial honourable mention</option>
                    <option value="Special recognition for diversity and inclusion">Special recognition for diversity and inclusion</option>
                </select>
            </label>
        )
    }
}

export default SelectAward;