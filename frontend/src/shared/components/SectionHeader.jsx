export default function SectionHeader({
  title,
  action,
}) {
  return (
    <div className="flex items-center justify-between">
      <h2 className="text-lg font-semibold">
        {title}
      </h2>

      {action && (
        <button className="text-sm font-medium text-emerald-500 hover:underline">
          {action}
        </button>
      )}
    </div>
  );
}