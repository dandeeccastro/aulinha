import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class PostsService {

	apiURL: string = 'http://localhost:8000/api/'
  constructor(public http: HttpClient) { }

	getPosts():Observable<any>{
		return this.http.get(this.apiURL + 'posts/');
	}

	getPost(id:number):Observable<any>{
		return this.http.get(this.apiURL + 'posts/' + id);
	}

	deletePosts(id:number):Observable<any>{
		return this.http.delete(this.apiURL + 'posts/' + id);
	}

	createPost(post:any):Observable<any> {
		return this.http.post(this.apiURL + 'posts', post);
	}

	updatePost(id:number, post:any):Observable<any>{
		return this.http.put(this.apiURL + 'posts/' + id, post);
	}
}
