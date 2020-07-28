import { Component, OnInit } from '@angular/core';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { TambahDataComponent } from '../tambah-data/tambah-data.component';
import {DialogKonfirmasiComponent} from '../dialog-konfirmasi/dialog-konfirmasi.component';
import {ApiService} from '../api.service'; 

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.css']
})
export class AdminComponent implements OnInit {

  constructor(
    public dialog:MatDialog,
    public api:ApiService ) { 
      this.getData(); 
    }
    dataAdmin:any=[];
  getData()
  {
    this.api.baca().subscribe(res=>{
      this.dataAdmin=res;
    })
	}

  ngOnInit(): void {
  }
  buatDaftar() {
    const dialogRef = this.dialog.open(TambahDataComponent, {
      width: '450px',
    });
    dialogRef.afterClosed().subscribe(result => {
      this.getData();

    });
  }
  editAdmin(data)
  {
    const dialogRef = this.dialog.open(TambahDataComponent, {
      width: '450px',
      data:data
    });
    dialogRef.afterClosed().subscribe(result => {
      this.getData();    
    });
  }
  konfirmasiHapus(id)
  {
    const dialogRef = this.dialog.open(DialogKonfirmasiComponent, {
      width: '450px',      
    });
    dialogRef.afterClosed().subscribe(result => {
      if(result == true)
      {
        console.log('Menghapus data');
        this.api.hapus(id).subscribe(res=>{
          this.getData();
        })
      }   
    });
  }
}
