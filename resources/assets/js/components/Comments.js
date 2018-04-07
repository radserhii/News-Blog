import React, {Component} from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

export default class Comments extends Component {

    constructor(props) {
        super(props);
        this.state = {
            newsId: this.props.id,
            comments: []
        };

        this.handleLiker = this.handleLiker.bind(this);
    }

    componentWillMount() {
        axios.get(`/api/news_comments/${this.state.newsId}`)
            .then(response => {
                this.setState({'comments': response.data.comments});
            })
            .catch(error => {
                console.log(error);
            });
    }

    handleLiker(commentId, action) {
        axios.get(`/api/comment_like_counter/${commentId}/${action}`)
            .then(response => {
                this.componentWillMount();
            })
            .catch(error => {
                console.log(error);
            });
    };

    render() {
        return (
            this.state.comments.map((comment) =>
                <div className="card" key={comment.id}>
                    <div className="card-header"><b>{comment.user.name}</b> {comment.created_at}</div>
                    <div className="card-body">
                        <p className="card-text">{comment.comment}</p>
                        <div className="row container">
                            <div className="_like">
                                <i onClick={() => this.handleLiker(comment.id, 'like')}
                                   className="fa fa-thumbs-up">
                                </i>
                                <span>{comment.like}</span>
                            </div>
                            <div className="_dislike">
                                <i onClick={() => this.handleLiker(comment.id, 'dislike')}
                                   className="fa fa-thumbs-down">
                                </i>
                                <span>{comment.dislike}</span>
                            </div>
                        </div>
                    </div>
                </div>
            )
        );
    }
}

const comments = document.getElementById('comments');
if (comments) {
    ReactDOM.render(<Comments {...(comments.dataset)}/>, comments);
}
