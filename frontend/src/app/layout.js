import "./globals.css";
import { AppProvider } from "@/providers/AppProvider";

export const metadata = {
  title: "CariCaj",
  description: "Malaysia EV Charging Navigation Platform",
};

export default function RootLayout({ children }) {
  return (
    <html lang="en" suppressHydrationWarning>
      <body>
        <AppProvider>
          {children}
        </AppProvider>
      </body>
    </html>
  );
}