function fibonacci(n) {
    let fib = [0, 1];
    for (let i = 2; i < n; i++) {
        fib[i] = fib[i - 1] + fib[i - 2];
    }
    return fib;
}

// Contoh penggunaan:
let n = 10; // Bisa diganti dengan variabel lain seperti 'x', 'y', dll.
            // angka setelah = merujuk pada banyaknya angka yang ingin ditampilkan
console.log(`${n} angka pertama deret Fibonacci: ${fibonacci(n).join(", ")}`);

const kalkulator = {
    tambah: (...angka) => angka.reduce((a, b) => a + b, 0),
    kurang: (...angka) => angka.reduce((a, b) => a - b),
    kali: (...angka) => angka.reduce((a, b) => a * b, 1),
    bagi: (...angka) => angka.reduce((a, b) => a / b),
    modulus: (...angka) => angka.reduce((a, b) => a % b)
};

// Contoh penggunaan:
console.log("Penjumlahan:", kalkulator.tambah(20, 15, 5));  // 40
console.log("Pengurangan:", kalkulator.kurang(100, 25, 15));  // 60
console.log("Perkalian:", kalkulator.kali(10, 5, 2));      // 100
console.log("Pembagian:", kalkulator.bagi(144, 12, 2));      // 6
console.log("Modulus:", kalkulator.modulus(28, 9));   // 1