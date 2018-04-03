import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class CounterNewsVisitors extends Component {
    render() {
        console.log(this.props.title);
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">{this.props.title}</div>

                            <div className="card-body">
                                I'm an example component  !

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
const counter = document.getElementById('counter');
if (counter) {
    ReactDOM.render(<CounterNewsVisitors {...(counter.dataset)}/>, counter);
}
