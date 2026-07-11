export default function PageHeader({ title, subtitle }) {
  return (
    <div className="space-y-1">
      <h1 className="text-2xl font-bold">{title}</h1>

      {subtitle && <p className="text-muted-foreground">{subtitle}</p>}
    </div>
  );
}
