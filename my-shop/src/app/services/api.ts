import { Injectable, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Products {
  id: number;
  nombre: string;
  precio: number;
}

@Injectable({
  providedIn: 'root',
})

export class Api {

  private http = inject(HttpClient);

  private apiUrl = 'http://localhost:3000/productos';

  getProducts(): Observable<Products[]> {
    return this.http.get<Products[]>(this.apiUrl);
  }

  createProduct(product: Products): Observable<Products> {
    return this.http.post<Products>(this.apiUrl, product);
  }

  updateProductComplete(id: number, producto: Products): Observable<Products> {
    return this.http.put<Products>(`${this.apiUrl}/${id}`, producto);
  }

  updatePproductPartial(id: number, cambios: Partial<Products>): Observable<Products> {
    return this.http.patch<Products>(`${this.apiUrl}/${id}`, cambios);
  }

  deleteProduct(id: number): Observable<void> {
    return this.http.delete<void>(`${this.apiUrl}/${id}`);
  }
}