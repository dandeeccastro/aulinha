import { Component } from '@angular/core';
import { PostsService } from '../services/posts.service';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

	posts: any[];
	constructor(public posts_service: PostsService) {
		this.getPosts();
	}

	getPosts():any{
		this.posts_service.getPosts().subscribe((res) => {
			this.posts = res.data;
			console.log(res.data)
		})
	}

	deletePost(id:number){
		this.posts_service.deletePosts(id).subscribe((res) => {
			console.log(res.data);
			if(res.status === 200){
				let id:number = res.data.id;
				for (let post of this.posts){
					if (post.id === id){
						let i:number = this.posts.indexOf(post);
						this.posts.splice(i,1);
					}
				}
			} else if (res.status === 400){
				alert('Deu ruim');
			} else {
				console.log('???')
			}
		});
	}
}
