import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class CounterNewsVisitors extends Component {

    constructor(props) {
        super(props);
        this.state = {
            countViewsNow: 0,
            countViewsAll: 0,
            id: this.props.id
        };

        axios.get(`/api/get_count/${this.props.id}`)
            .then(response => {
                this.setState({'countViewsAll': response.data.count});

                const counterViewsNow = () => {
                    const currentViews = Math.floor(Math.random() * 6);
                    const allViews = this.state.countViewsAll;
                    this.setState({'countViewsNow': currentViews, 'countViewsAll': allViews + currentViews});
                };

                setInterval(() => {
                    counterViewsNow();
                }, 3000);

            })
            .catch(error => {
                console.log(error);
            });
    }

    render() {
        axios.post(`/api/update_count/${this.state.id}`, {count_views: this.state.countViewsAll})
            .then(response => {
                return null;
            })
            .catch(error => {
                console.log(error);
            });

        return (
            <div className="container">
                <div className="row justify-content-start">
                    <div className="col-md-3">
                        <div className="card">
                            <div className="card-header">All Views: {this.state.countViewsAll}</div>
                            <div className="card-header">Views Now {this.state.countViewsNow}</div>
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
