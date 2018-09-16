import {Component, OnInit, Renderer2} from '@angular/core';
import {FileItem, HttpClientUploadService} from '@wkoza/ngx-upload';
import {User} from "../../models/user";

@Component({
  selector: 'app-dashboard',
  templateUrl: './dashboard.component.html',
  styleUrls: ['./dashboard.component.scss']
})
export class DashboardComponent implements OnInit {

  model: User;
  constructor(public uploader: HttpClientUploadService, private renderer: Renderer2) {
  }

  ngOnInit() {


    this.uploader.queue = [];

    this.model = new User();

    this.uploader.onCancel$.subscribe(
      (data: FileItem) => {
        console.log('file canceled: ' + data.file.name);

      });

    this.uploader.onProgress$.subscribe(
      (data: any) => {
        console.log('upload file in progree: ' + data.progress);

      });

    this.uploader.onSuccess$.subscribe(
      (data: any) => {
        console.log(`upload file successful:  ${data.item} ${data.body} ${data.status} ${data.headers}`);



      }
    );


  }

  makeThumbnail(item: FileItem, el: any) {
    const reader = new FileReader();

    reader.onload = function (e) {
      // get loaded data and render thumbnail.
      //   document.getElementById("thumbnail").src = e.target.result;
      // this.renderer.setProperty(el,'src',e.target.result)
    };

    // read the image file as a data URL.
    reader.readAsDataURL(item.file);

  }

  activeRemoveAllBtn(): boolean {
    return this.uploader.queue.some(item => (item.isReady || item.isCancel || item.isError));
  }

  activeUploadAllBtn(): boolean {
    return this.uploader.queue.some(item => (item.isReady));
  }

  activeCancelAllBtn(): boolean {
    return this.uploader.queue.some((item: FileItem) => item.uploadInProgress);
  }

}
