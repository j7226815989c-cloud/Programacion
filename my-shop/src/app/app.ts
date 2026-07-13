import { Component, signal, inject, OnInit } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import { Api, Products } from './services/api';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet],
  templateUrl: './app.html',
  styleUrl: './app.css'
})
export class App implements OnInit {

  protected readonly title = signal('eshop');

  private readonly apiService = inject(Api);

  productList = signal<Products[]>([]);

  ngOnInit(): void {
    this.getProducts();
  }

  getProducts() {

    this.apiService.getProducts().subscribe({
      next: (data) => {
        this.productList.set(data);
        console.log(data);
      },
      error: (err) => console.error('Error en GET:', err)
    });

  }

  deleteProduct(id: number) {

    this.apiService.deleteProduct(id).subscribe({
      next: () => {
        this.getProducts();
      },
      error: (err) => console.error('Error en DELETE:', err)
    });

  }
}