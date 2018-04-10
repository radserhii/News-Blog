import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class SearchFilter extends Component {
    constructor(props) {
        super(props);
        this.state = {
            tags: [],
            tagsFind: [],
            categories: [],
            categoriesFind: [],
            news: [],
            error: false
        };

        this.handleKeyDownTags = this.handleKeyDownTags.bind(this);
        this.handleKeyDownCategories = this.handleKeyDownCategories.bind(this);
        this.handleListClickTags = this.handleListClickTags.bind(this);
        this.handleListClickCategories = this.handleListClickCategories.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);

        axios.get('/api/get_tags')
            .then(response => {
                this.setState({'tags': [...response.data.tags]});
            })
            .catch(error => {
                console.log(error);
            });

        axios.get('/api/get_categories')
            .then(response => {
                this.setState({'categories': [...response.data.categories]});
            })
            .catch(error => {
                console.log(error);
            });

    }

    handleKeyDownTags(event) {
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

    handleKeyDownCategories(event) {
        event.persist();
        setTimeout(() => {
            if (!event.target.value) {
                this.setState({categoriesFind: []});
                return;
            }
            const categoriesFind = this.state.categories.filter(function (category) {
                return category.name.indexOf(event.target.value) >= 0;
            });
            this.setState({categoriesFind: categoriesFind});
        }, 100);
    };

    handleListClickTags(e, name) {
        this.refs.inputTag.value = name;
        this.setState({tagsFind: []});
    }

    handleListClickCategories(e, name) {
        this.refs.inputCaregory.value = name;
        this.setState({categoriesFind: []});
    }

    handleSubmit() {

        if (!this.refs.dateStart.value
            || !this.refs.dateEnd.value
            || !this.refs.inputTag.value
            || !this.refs.inputCaregory.value) {
            this.setState({error: true, news: []});
            return null;
        }

        this.setState({error: false});

        axios.post(`/api/get_news`, {
            startDate: this.refs.dateStart.value,
            endDate: this.refs.dateEnd.value,
            tag: this.refs.inputTag.value,
            category: this.refs.inputCaregory.value,
        })
            .then(response => {
                this.setState({'news': [...response.data]});
            })
            .catch(error => {
                console.log(error);
            });
    }

    render() {

        const listSearchTags = this.state.tagsFind.map((tag) =>
            <li key={tag.id}
                onClick={(e) => this.handleListClickTags(e, tag.tag_name)}>{tag.tag_name}
            </li>
        );

        const listSearchCategories = this.state.categoriesFind.map((category) =>
            <li key={category.id}
                onClick={(e) => this.handleListClickCategories(e, category.name)}>{category.name}
            </li>
        );

        const listNews = this.state.news.map((news) =>
            <div key={news.id}>
                <a href="#">{news.title}</a>
            </div>
        );
        const error = "Input all fields";


        return (
            <div className="_search-filter">
                <h3>Filter news</h3>
                <div className={this.state.error ? "_error" : ""}>{this.state.error ? error : ""}</div>
                <div className="row">
                    {/*date*/}
                    <div className="col-sm-4">
                        <div className="row">
                            <div className="col-sm-6">
                                <input
                                    ref="dateStart"
                                    type="date"
                                    name="bday"
                                    max="3000-12-31"
                                    min="1000-01-01"
                                    className="form-control"
                                    required/>
                            </div>
                            <div className="col-sm-6">
                                <input
                                    ref="dateEnd"
                                    type="date"
                                    name="bday"
                                    min="1000-01-01"
                                    max="3000-12-31"
                                    className="form-control"
                                    required/>
                            </div>
                        </div>
                    </div>
                    {/*tags*/}
                    <div className="col-sm-3">
                        <input ref="inputTag"
                               className="form-control "
                               onKeyDown={this.handleKeyDownTags}
                               type="search"
                               placeholder="Tags"
                               aria-label="Search"
                               required/>
                        <div className="_list-group">
                            <ul className="list-group">{listSearchTags}</ul>
                        </div>
                    </div>

                    {/*category*/}
                    <div className="col-sm-3">
                        <input ref="inputCaregory"
                               className="form-control "
                               onKeyDown={this.handleKeyDownCategories}
                               type="search"
                               placeholder="Category"
                               aria-label="Search"
                               required/>
                        <div className="_list-group">
                            <ul className="list-group">{listSearchCategories}</ul>
                        </div>
                    </div>
                    {/*submit*/}
                    <div className="col-sm-2">
                        <button className="btn btn-outline-success"
                                onClick={this.handleSubmit}
                                type="submit">Search news
                        </button>
                    </div>
                </div>
                <br/>
                {listNews}
            </div>
        )
    }
}


if (document.getElementById('search-filter')) {
    ReactDOM.render(<SearchFilter/>, document.getElementById('search-filter'));
}