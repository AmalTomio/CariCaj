import { Poppins } from "next/font/google";
import "./globals.css";

import AppProvider from "@/providers/AppProvider";

const poppins = Poppins({
  subsets: ["latin"],
  weight: [
    "300",
    "400",
    "500",
    "600",
    "700",
    "800",
  ],
  variable: "--font-poppins",
    display: "swap",
});

export const metadata = {
  title: "CariCaj",
  description: "Find EV Charging Stations in Malaysia",
};

export default function RootLayout({ children }) {
  return (
    <html lang="en" suppressHydrationWarning>
      <body className={`${poppins.variable} antialiased`}>
        <AppProvider>
          {children}
        </AppProvider>
      </body>
    </html>
  );
}