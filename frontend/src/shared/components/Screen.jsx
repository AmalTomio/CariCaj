export default function Screen({ children, className = "" }) {
  return (
    <main
      className={`
        min-h-screen
        bg-background
        ${className}
      `}
    >
      {children}
    </main>
  );
}
