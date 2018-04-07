import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class SearchTags extends Component {
    constructor(props) {
        super(props);
        this.state = {
            tags: [],
            tagsFind: []
        };

        this.handleKeyDown = this.handleKeyDown.bind(this);
        this.handleListClick = this.handleListClick.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);

        axios.get('/api/get_tags')
            .then(response => {
                this.setState({'tags': [...response.data.tags]});
            })
            .catch(error => {
                console.log(error);
            })
    }

    handleKeyDown(event) {
        event.persist();
        setTimeout(() => {
            if (!event.target.value) {
                this.setState({tagsFind: []});
                return;
            }
            const tagsFind = this.state.tags.filter(function (tag) {
                return tag.tag_name.indexOf(event.target.value) >= 0;
            });
            this.setState({tagsFind: tagsFind});
        }, 100);

    };

    handleListClick(e, name) {
        this.refs.input.value = name;
        this.setState({tagsFind: []});
    }

    handleSubmit() {
        window.location.pathname = "/news_tag_name/" + this.refs.input.value;
    }

    render() {
        const listSearchTags = this.state.tagsFind.map((tag) =>
            <li key={tag.id} onClick={(e) => this.handleListClick(e, tag.tag_name)}>{tag.tag_name}</li>
        );
        return (
            <div className="_search">
                <div className="row">
                    <div className="col-sm-8">
                        <input ref="input" className="form-control " onKeyDown={this.handleKeyDown} type="search"
                               placeholder="Search tags" aria-label="Search"/>
                    </div>
                    <div className="col-sm-4">
                        <button className="btn btn-outline-success" onClick={this.handleSubmit} type="submit">Search
                            news
                        </button>
                    </div>
                </div>
                <div className="_list-group">
                    <ul className="list-group">{listSearchTags}</ul>
                </div>
            </div>
        )
    }
}


if (document.getElementById('search')) {
    ReactDOM.render(<SearchTags/>, document.getElementById('search'));
}