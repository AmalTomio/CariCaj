"use client";

import QueryProvider from "./QueryProvider";
import ThemeProvider from "./ThemeProvider";
import { Toaster } from "sonner";

export default function AppProvider({ children }) {
  return (
    <ThemeProvider>
      <QueryProvider>
        {children}

        <Toaster
          position="top-center"
          richColors
          closeButton
        />
      </QueryProvider>
    </ThemeProvider>
  );
}