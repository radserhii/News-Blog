import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import {CookiesProvider, Cookies} from 'react-cookie';
// import axios from 'axios';

export default class PopUp extends Component {

    constructor(props) {
        super(props);

        this.state = {
            popUp: false
        };

        this.handleClose = this.handleClose.bind(this);

        const cookies = new Cookies();

        if (!cookies.get("date")) {
            const date = new Date();
            const dateTime = date.getTime();
            date.setTime(date.getTime() + (15 * 60 * 1000));
            cookies.set("date", dateTime, {path: "/", expires: date});
        }

        let dateAction = Number(cookies.get("date")) + 15000;

        let interval = setInterval(() => {
            const newDate = Number(new Date());
            if (newDate >= dateAction && newDate < dateAction + 2000) {
                this.setState({popUp: true});
                clearInterval(interval);
            }
            if (newDate > dateAction + 2000) {
                clearInterval(interval);
            }
        }, 1000);
    }

    handleClose() {
        this.setState({popUp: false});
    }


    render() {
        if (this.state.popUp) {
            return (
                <div className="_modal">
                    <div className="_modal-content">
                        <div className="_modal-header">
                            <h5>Subscribe to news?</h5>
                        </div>
                        <div className="offset-sm-2 col-sm-8">
                            First Name:
                            <input type="text" className="form-control"/>
                            Last Name:
                            <input type="text" className="form-control"/>
                            Email:
                            <input type="email" className="form-control"/>
                        </div>
                        <hr />
                        <div>
                            <button type="button" className="btn btn-primary">Subscribe</button>
                            <button type="button" className="btn btn-secondary" onClick={this.handleClose}>Close</button>
                        </div>
                    </div>
                </div>
            )
        }
        return null;
    }
}


ReactDOM.render(
    <CookiesProvider>
        <PopUp/>
    </CookiesProvider>,
    document.getElementById('popup')
);
