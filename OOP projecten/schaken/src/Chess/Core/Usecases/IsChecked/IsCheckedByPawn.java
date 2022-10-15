package Chess.Core.Usecases.IsChecked;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.King;
import Chess.Core.Pieces.Pawn;
import Chess.Core.Usecases.LocateKing.LocateKing;

public abstract class IsCheckedByPawn extends IsChecked
{
    @Override
    public boolean execute(Board board, Color color) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var kingLocation = locateKing.locate(board, color);
        var king = (King) board.getPiece(kingLocation);
        if (king.getColor() != requiredKingColor())
            return false;

        var leftAttack = isAttacked(board, king, leftAttackerCoords(kingLocation));
        var rightAttack = isAttacked(board, king, rightAttackerCoords(kingLocation));

        return leftAttack || rightAttack;
    }

    private boolean isAttacked(Board board, King king, Coords coords) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        if (!board.pieceOnField(coords))
            return false;

        var piece = board.getPiece(coords);
        var isPawn = piece instanceof Pawn;
        var isOppositeColored = piece.getColor() != king.getColor();
        return isPawn && isOppositeColored;
    }

    protected abstract Coords leftAttackerCoords(Coords kingLocation);
    protected abstract Coords rightAttackerCoords(Coords kingLocation);
    protected abstract Color requiredKingColor();
}